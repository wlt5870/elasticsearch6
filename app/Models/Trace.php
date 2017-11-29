<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Trace extends Model
{
    use Searchable;

    const STATUS_FINISHED = 'finished';
    const STATUS_INVALID = 'invalid';
    const STATUS_READY = 'ready';

    const TYPE_QT = 'QT';
    const TYPE_JD = 'JD';
    const TYPE_BF = 'BF';
    const TYPE_WT = 'WT';
    const TYPE_SK = 'SK';
    const TYPE_CS = 'CS';
    const TYPE_DK = 'DK';
    const TYPE_DH = 'DH';
    const TYPE_PK = 'PK';
    const TYPE_XT = 'XT';
    const TYPE_CKDH = 'CKDH';
    const TYPE_CKYF = 'CKFY';

    public static $typeAliases = [
    self::TYPE_QT   => '其他',//房源
    self::TYPE_JD   => '接待',
    self::TYPE_BF   => '拜访',
    self::TYPE_DH   => '电话',
    self::TYPE_SK   => '实勘',
    self::TYPE_CKDH => '查看电话',
    self::TYPE_CKYF => '查看房源',

    self::TYPE_WT   => '委托',//客源
    self::TYPE_CS   => '磋商',
    self::TYPE_DK   => '带看',
    self::TYPE_PK   => '陪看',
    self::TYPE_XT   => '系统',
];

    protected $fillable = [
    'type',
    'uuid',
    'agent_id',
    'call_record_id',
    'trackable_id',
    'trackable_type',
    'inviterable_id',
    'inviterable_type',
    'virtual_source',
    'description',
    'finished_at',
    'approver_id',
    'approve_at',
    'summary',
    'raider_id',
    'raided_at',
    'raided_summary',
    'capsule',
    'link',
    'sk_pic',
    'is_top',
    'status',
    'laiyuan',
    'follow_aim_tid',
    'follow_by_tid',
    'member_id',
    'agent_commented_at',
    'owner_commented_at',
    'client_commented_at',
    'company_id',
    'company_area_id',
    'company_big_area_id',
    'store_id',
    'store_group_id',
    'orderId',
    'callSid',
    'source_uuid',
    'source_id',
    'client_uuid',
    'client_id',
    'is_done',
    'sponsor',
    'is_show',
    'org_sponsor_type',
];

    protected $casts = [
    'link'      => 'json',
    'capsule'   => 'json',
    'member_id' => 'string',
    'sk_pic'    => 'json',
    'is_show'   => 'boolean',
];

    protected $loads = [
    'approver',
    'raider',
];

    protected $dates = [
    'approve_at',
    'finished_at',
    'agent_commented_at',
    'owner_commented_at',
    'client_commented_at',
];

    protected $indexs = [
    '*',
    'type',
    'uuid',
    'agent.name',
    'finished_at',
    'trackable_id',
    'agent.store_id',
    'trackable_type',
    'is_top',
    'trackable.uuid',
];

    public function searchableAs()
    {
        return 'trace_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
