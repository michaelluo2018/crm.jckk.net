var dom = document.getElementById("visitor1");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '客户一级状态',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['潜在客户','需求客户','提案客户','签约客户']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'潜在客户'},
                {value:310, name:'需求客户'},
                {value:234, name:'提案客户'},
                {value:135, name:'签约客户'}                
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}

//客户二级状态 
var dom = document.getElementById("visitor2");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '客户二级状态',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['战略级客户','品牌级客户','核心级客户','普通级客户']
    },
    series : [
        {
            name: '合作客户状态',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'战略级客户'},
                {value:310, name:'品牌级客户'},
                {value:234, name:'核心级客户'},
                {value:135, name:'普通级客户'}                
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}


//合同状态 
var dom = document.getElementById("visitor3");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '合同状态',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['合约审核','合约签署','合约执行','合约完成','续约审核','续约签署','续约执行','续约完成']
    },
    series : [
        {
            name: '合同状态',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'合约审核'},
                {value:310, name:'合约签署'},
                {value:234, name:'合约执行'},
                {value:135, name:'合约完成'},
                {value:135, name:'续约审核'},
                {value:135, name:'续约签署'},
                {value:135, name:'续约执行'},
                {value:135, name:'续约完成'}                
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}


//项目统计 
var dom = document.getElementById("visitor4");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '项目统计',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['品牌信息壁垒体系','创意策划传播','平面视觉','视频视觉','媒介资源采购','技术开发','整合营销顾问','效果营销优化','新媒体运营']
    },
    series : [
        {
            name: '项目类别',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'品牌信息壁垒体系'},
                {value:310, name:'创意策划传播'},
                {value:234, name:'平面视觉'},
                {value:135, name:'视频视觉'},
                {value:135, name:'媒介资源采购'},
                {value:135, name:'技术开发'},
                {value:135, name:'整合营销顾问'},
                {value:135, name:'效果营销优化'},
                {value:135, name:'新媒体运营'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}