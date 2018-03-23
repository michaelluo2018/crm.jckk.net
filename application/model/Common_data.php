<?php
namespace  app\index\model;

Class Common_data{
    public  $data;

    function __construct()
    {
        $this->data  =  [

            //客户类别
            "customer_type"=>[
                "战略级客户",
                "品牌级客户",
                "核心级客户",
                "普通级客户",
            ],

            //客户状态
            "customer_status"=>[
                "潜在客户",
                "需求客户",
                "提案客户",
                "签约客户",
            ],

            //客户行业
            "industry"=>[
                "贵金属",
                "在线教育",
                "电子商务",
                "外汇",
            ],

            //公司性质
            "company_nature"=>[
                "合资",
                "民营",
                "国企",
                "其他",
            ],

            //年营业额
            "annual_turnover"=>[
                "10万以内",
                "10-50万",
                "50-100万",
                "100万以上",
            ],

            //职位

            "position"=>[
                "采购经理",
                "市场总监",
            ]

        ];
    }


}