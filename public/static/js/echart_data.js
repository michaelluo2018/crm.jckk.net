var dom = document.getElementById("visitor1");
var myChart = echarts.init(dom);
var app = {};

//客户状态一
var customer_status_1=document.getElementsByClassName("customer_status_1");
var customer_status_1_length = customer_status_1.length;
var customer_status_1_key = [];
var customer_status_1_value = [];
for(var i=0;i<customer_status_1_length;i++){
    customer_status_1_key[i] =customer_status_1[i].name;

    customer_status_1_value[i] =  {value:customer_status_1[i].value, name:customer_status_1[i].name};
}

//客户状态二
var customer_status_2=document.getElementsByClassName("customer_status_2");
var customer_status_2_length = customer_status_2.length;
var customer_status_2_key = [];
var customer_status_2_value = [];
for(var i=0;i<customer_status_2_length;i++){
    customer_status_2_key[i] =customer_status_2[i].name;

    customer_status_2_value[i] =  {value:customer_status_2[i].value, name:customer_status_2[i].name};
}


//合同状态
var contract_status=document.getElementsByClassName("contract_status");
var contract_status_length = contract_status.length;
var contract_status_key = [];
var contract_status_value = [];
for(var i=0;i<contract_status_length;i++){
    contract_status_key[i] =contract_status[i].name;

    contract_status_value[i] =  {value:contract_status[i].value, name:contract_status[i].name};
}


//项目统计
var product_demand=document.getElementsByClassName("product_demand_1");
var product_demand_length = product_demand.length;
var product_demand_key = [];
var product_demand_value = [];
for(var i=0;i<product_demand_length;i++){
    product_demand_key[i] =product_demand[i].name;

    product_demand_value[i] =  {value:product_demand[i].value, name:product_demand[i].name};
}


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
       // data: ['潜在客户','需求客户','提案客户','签约客户']
        data: customer_status_1_key
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],

            data:customer_status_1_value,
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
      //  data: ['战略级客户','品牌级客户','核心级客户','普通级客户']
        data: customer_status_2_key

    },
    series : [
        {
            name: '合作客户状态',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:customer_status_2_value,
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
        data: contract_status_key
    },
    series : [
        {
            name: '合同状态',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:contract_status_value,
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
        data: product_demand_key
    },
    series : [
        {
            name: '项目类别',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:product_demand_value,
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