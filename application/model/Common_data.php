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
            ],

            //部门
            "department"=>[
                "项目部",
                "新媒体部",
                "媒介部",
                "SEM",
                "技术部",
                "创意策划部",
            ],

            //合同状态
            "contract_status"=>[
                "合约审核",
                "合约签署",
                "合约执行",
                "合约完成",
                "续约审核",
                "续约签署",
                "续约执行",
                "续约完成",
            ],

            //回款模式
            "payment_type"=>[
                "合约审核",
                "合约签署",
                "合约执行",
                "合约完成",
                "续约审核",
                "续约签署",
                "续约执行",
                "续约完成",
            ],

            //回款状态

            "payment_status"=>[
                "合约审核",
                "合约签署",
                "合约执行",
                "合约完成",
                "续约审核",
                "续约签署",
                "续约执行",
                "续约完成",
            ],

            //产品需求
            "product_demand"=>[
                  "品牌信息壁垒体系"=>[
                      "官网SEO",
                      "自然流量优化",
                      "新闻信息环境优化",
                      "口碑信息环境优化",
                      "公关信息环境优化",
                      "舆情风险管理",
                      "ASO/天猫/京东泛优化",
                  ],
                "创意策划传播"=>[
                    "事件创意策划传播",
                    "活动创意策划传播",
                    "话题创意策划传播",
                ],
                "平面视觉"=>[
                    "创意海报",
                    "UI设计",
                    "平面设计",
                    "VI视觉体系设计",
                    "产品包装设计",
                ],
                "视频视觉"=>[
                    "TVC视频",
                    "素材拼接视频",
                    "建模视频",
                    "故事场景视频",
                ],
                "媒介资源采购"=>[
                    "程序化媒体资源",
                    "户外社区媒体资源",
                    "校园媒体资源",
                    "社交媒体资源",
                    "非标准媒体资源",
                ],
                "技术开发"=>[
                    "全网站交互与功能开发",
                    "小程序开发",
                    "APP开发",
                    "定制化系统开发",
                ],
                "整合营销顾问"=>[
                    "品牌战略顾问",
                    "市场战略顾问",
                    "全案市场顾问",
                ],
                "效果营销优化"=>[
                    "程序化媒体效果优化",
                    "非标媒体效果优化",
                ],
                "新媒体运营",
            ],




        ];


    }


}