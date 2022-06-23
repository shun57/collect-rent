<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static EveryDay()
 * @method static static PerTreeDay()
 * @method static static Weekly()
 */
final class LentFrequencyType extends Enum
{
    const EveryDay =   1;
    const PerTreeDay =   3;
    const Weekly = 7;
}
