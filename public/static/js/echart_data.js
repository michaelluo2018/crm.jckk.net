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
                {value:document.getElementById('潜在客户').value, name:'潜在客户'},
                {value:document.getElementById('需求客户').value, name:'需求客户'},
                {value:document.getElementById('提案客户').value, name:'提案客户'},
                {value:document.getElementById('签约客户').value, name:'签约客户'}
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
                {value:document.getElementById('战略级客户').value, name:'战略级客户'},
                {value:document.getElementById('品牌级客户').value, name:'品牌级客户'},
                {value:document.getElementById('核心级客户').value, name:'核心级客户'},
                {value:document.getElementById('普通级客户').value, name:'普通级客户'}
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
                {value:document.getElementById('合约审核').value, name:'合约审核'},
                {value:document.getElementById('合约签署').value, name:'合约签署'},
                {value:document.getElementById('合约执行').value, name:'合约执行'},
                {value:document.getElementById('合约完成').value, name:'合约完成'},
                {value:document.getElementById('续约审核').value, name:'续约审核'},
                {value:document.getElementById('续约签署').value, name:'续约签署'},
                {value:document.getElementById('续约执行').value, name:'续约执行'},
                {value:document.getElementById('续约完成').value, name:'续约完成'}
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
                {value:document.getElementById('品牌信息壁垒体系').value, name:'品牌信息壁垒体系'},
                {value:document.getElementById('创意策划传播').value, name:'创意策划传播'},
                {value:document.getElementById('平面视觉').value, name:'平面视觉'},
                {value:document.getElementById('视频视觉').value, name:'视频视觉'},
                {value:document.getElementById('媒介资源采购').value, name:'媒介资源采购'},
                {value:document.getElementById('技术开发').value, name:'技术开发'},
                {value:document.getElementById('整合营销顾问').value, name:'整合营销顾问'},
                {value:document.getElementById('效果营销优化').value, name:'效果营销优化'},
                {value:document.getElementById('新媒体运营').value, name:'新媒体运营'}
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