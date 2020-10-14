<?php

namespace Tnhnclskn\Ilkbyte;

class Server
{
    private Ilkbyte $ilkbyte;
    private string $name;

    public function __construct(Ilkbyte $ilkbyte, string $name)
    {
        $this->ilkbyte = $ilkbyte;
        $this->name = $name;
    }

    public function show()
    {
        return $this->ilkbyte->serverShow($this->name);
    }

    public function monitor()
    {
        return $this->ilkbyte->serverMonitor($this->name);
    }

    public function power($power)
    {
        return $this->ilkbyte->serverPower($this->name, $power);
    }

    public function rdns($ip, $rdns)
    {
        return $this->ilkbyte->serverRdns($this->name, $ip, $rdns);
    }

    public function ipLogs()
    {
        return $this->ilkbyte->serverIpLogs($this->name);
    }

    public function snapshots()
    {
        return $this->ilkbyte->serverSnapshotList($this->name);
    }

    public function snapshotRevert($snapshotId)
    {
        return $this->ilkbyte->serverSnapshotRevert($this->name, $snapshotId);
    }

    public function backups()
    {
        return $this->ilkbyte->serverBackupList($this->name);
    }

    public function backupRevert($backupId)
    {
        return $this->ilkbyte->serverBackupRevert($this->name, $backupId);
    }
}
