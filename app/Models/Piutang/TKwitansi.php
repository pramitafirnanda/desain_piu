<?php

namespace App\Models\Piutang;

use App\Models\TesCode;
use Illuminate\Database\Eloquent\Model;

class TKwitansi extends Model
{
    protected $connection = 'db_piutang';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    public function __construct($tahun = null)
    {
        parent::__construct();
        $this->setTableForYear($tahun ?? date('Y'));
    }

    public function setTableForYear($tahun)
    {
        $this->table = 'TKwitansi_' . $tahun;
    }

    public function agentCode()
    {
        return $this->belongsTo(TesCode::class, 'AgentCode', 'code');
    }
}


