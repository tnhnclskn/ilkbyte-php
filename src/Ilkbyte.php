<?php

namespace Tnhnclskn\Ilkbyte;

use Exception;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

class Ilkbyte
{
    const API_URL = 'https://api.ilkbyte.com/';

    private Client $client;
    private string $accessKey;
    private string $secretKey;

    public function __construct(string $accessKey, string $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->generateClient();
    }

    private function generateClient()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL,
        ]);
    }

    public static function create(array $config = []): self
    {
        if (!isset($config['acces_key']) && getenv('ILKBYTE_ACCESS_KEY')) {
            $config['access_key'] = getenv('ILKBYTE_ACCESS_KEY');
        }
        if (!isset($config['secret_key']) && getenv('ILKBYTE_SECRET_KEY')) {
            $config['secret_key'] = getenv('ILKBYTE_SECRET_KEY');
        }
        return new self($config['access_key'], $config['secret_key']);
    }

    private function authParameters(): array
    {
        return [
            'access' => $this->accessKey,
            'secret' => $this->secretKey,
        ];
    }

    private function request(string $method, string $endpoint, array $parameters = []): ?object
    {
        $parameters = array_merge($parameters, $this->authParameters());
        $options = [
            'query' => $parameters
        ];
        $request = $this->client->request($method, $endpoint, $options);
        $response = (string) $request->getBody();
        $data = json_decode($response);
        if ($data->status) {
            return $data->data;
        } else {
            throw new Exception("ILKBYTE: {$data->error}");
        }
    }

    private function get(string $endpoint, array $parameters = []): ?object
    {
        return $this->request('GET', $endpoint, $parameters);
    }

    public function test()
    {
        return $this->get("/");
    }

    public function server($name): Server
    {
        return new Server($this, $name);
    }

    public function domain($domain): Domain
    {
        return new Domain($this, $domain);
    }

    public function serverList()
    {
        return $this->get("/server/list");
    }

    public function serverListAll()
    {
        return $this->get("/server/list/all");
    }

    public function serverCreate()
    {
        return $this->get("/server/create");
    }

    public function serverCreateConfig(string $username, string $password, string $name, ?int $osId = null, ?int $appId = null, $packageId, string $sshKeys = '')
    {
        if (is_null($appId)) $appId = 0;
        if (is_null($osId)) $osId = 0;
        return $this->get("/server/create/config", [
            'username' => $username,
            'pasword' => $password,
            'name' => $name,
            'os_id' => $osId,
            'app_id' => $appId,
            'package_id' => $packageId,
            'sshkey' => $sshKeys
        ]);
    }

    public function serverShow($name)
    {
        return $this->get("server/manage/{$name}/show");
    }

    public function serverMonitor($name)
    {
        return $this->get("server/manage/{$name}/monitor");
    }

    public function serverPower($name, $power)
    {
        if (!in_array($power, ['start', 'shutdown', 'reboot', 'destroy'])) {
            throw new Exception('You have entered an invalid power option.');
        }
        return $this->get("/server/manage/{$name}/power", [
            'set' => $power,
        ]);
    }

    public function serverRdns($name, $ip, $rdns)
    {
        return $this->get("/server/manage/{$name}/ip/rdns", [
            'ip' => $ip,
            'rdns' => $rdns,
        ]);
    }

    public function serverIpLogs($name)
    {
        return $this->get("/server/manage/{$name}/ip/logs");
    }

    public function serverSnapshotList($name)
    {
        return $this->get("/server/manage/{$name}/snapshot/list");
    }

    public function serverSnapshotRevert($name, $snapshotId)
    {
        return $this->get("/server/manage/{$name}/snapshot/revert", [
            'snapshot_id' => $snapshotId
        ]);
    }

    public function serverBackupList($name)
    {
        return $this->get("/server/manage/{$name}/backup/list");
    }

    public function serverBackupRevert($name, $backupId)
    {
        return $this->get("/server/manage/{$name}/backup/revert", [
            'backup_id' => $backupId
        ]);
    }

    public function domainList()
    {
        return $this->get("/domain/list");
    }

    public function domainCreate($domain)
    {
        return $this->get("/domain/create", [
            'domain' => $domain
        ]);
    }

    public function domainShow($domain)
    {
        return $this->get("/domain/manage/{$domain}/show");
    }

    public function domainAdd($domain, $recordName, $recordType, $recordContent, $recordPriority = null)
    {
        if (!in_array($recordType, ['A', 'AAAA', 'CNAME', 'MX', 'TXT', 'NS'])) {
            throw new Exception('You have entered an invalid record type.');
        }
        return $this->get("/domain/manage/{$domain}/add", [
            'record_name' => $recordName,
            'record_type' => $recordType,
            'record_content' => $recordContent,
            'record_priority' => $recordPriority,
        ]);
    }

    public function domainUpdate($domain, $recordId, $recordContent, $recordPriority = null)
    {
        return $this->get("/domain/manage/{$domain}/update", [
            'record_id' => $recordId,
            'record_content' => $recordContent,
            'record_priority' => $recordPriority,
        ]);
    }

    public function domainDelete($domain, $recordId)
    {
        return $this->get("/domain/manage/{$domain}/delete", [
            'record_id' => $recordId,
        ]);
    }

    public function domainPush($domain)
    {
        return $this->get("/domain/manage/{$domain}/push");
    }

    public function account()
    {
        return $this->get("/account");
    }

    public function accountPayment()
    {
        return $this->get("/account/payment");
    }
}
