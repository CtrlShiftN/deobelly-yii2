<?php

namespace common\components;
class SystemConstant
{
    // Api status
    const API_SUCCESS_STATUS = 1;
    const API_UNSUCCESS_STATUS = 0;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const LIMIT_PER_PAGE = 12;
    const POST_PER_PAGE = 8;
    const SEGMENT_TYPE = 0;
    const PT_TAILOR_MADE = 2;
    const URL_TAILOR_MADE = 'tailor-made';
    const PT_MIX_AND_MATCH = 3;
    const URL_MIX_AND_MATCH = 'mix-and-match';
    const PRODUCT_TYPE_NEW = 1;
    const PRODUCT_HIDE = 1;
    const PRODUCT_SHOW = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const SHOWROOM_PER_PAGE = 30;
    const VAT = 10;
}