<?php
/* Smarty version 3.1.30, created on 2018-08-03 16:39:22
  from "D:\wamp64\www\18shujia\lesson_11\view\ucenter\address.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b6414baa0ea14_64929808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b7f01a7089d0c97488c552da3a421b6e6daa2c0' => 
    array (
      0 => 'D:\\wamp64\\www\\18shujia\\lesson_11\\view\\ucenter\\address.html',
      1 => 1533282210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.html' => 1,
    'file:ucenter/menu.html' => 1,
  ),
),false)) {
function content_5b6414baa0ea14_64929808 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="http://unpkg.com/iview/dist/styles/iview.css">
<!-- import iView -->
<?php echo '<script'; ?>
 src="http://unpkg.com/iview/dist/iview.min.js"><?php echo '</script'; ?>
>
<div class="container">
	<div class="col-md-3"><?php $_smarty_tpl->_subTemplateRender("file:ucenter/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
	<div class="col-md-9">
		<h3>
			收货地址管理
			<a @click="show=true"  class="btn btn-success">添加地址</a>
		</h3>
 
		<modal v-model="show" @on-ok="add">

			<form action="" class="form">
				<div class="from-group">
					<label >收货人</label>
					<input v-model="receive_people" type="text" class="form-control"></div>
				<div class="from-group">
					<label>选择地区</label>
					<Cascader :data="data" v-model="area"></Cascader>
				</div>
			</form>
		</modal>
		<ul>
			<li v-for="(addr,n) in addr_list">
				<p>收货人：$addr.receive_people$</p>		
				<p>收货地址：$addr.area$</p>	
				<a @click="remove(n)" class="btn btn-danger">删除</a>	
				<a @click="edit(addr)" class="btn btn-info">编辑</a>	
			</li>
		</ul>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	Vue.http.options.emulateJSON = true;

	new Vue({
		el:'.container',
		delimiters:['$','$'],
		data:{
			show:false,
			addr_list:[],
			receive_people:'',//收货人
			area:'',//选择后赋值给它
			data:[{
                    value: 'beijing',
                    label: '北京',
                    children: [
                        {
                            value: 'gugong',
                            label: '故宫'
                        },
                        {
                            value: 'tiantan',
                            label: '天坛'
                        },
                        {
                            value: 'wangfujing',
                            label: '王府井'
                        }
                    ]
                }, {
                    value: 'jiangsu',
                    label: '江苏',
                    children: [
                        {
                            value: 'nanjing',
                            label: '南京',
                            children: [
                                {
                                    value: 'fuzimiao',
                                    label: '夫子庙',
                                }
                            ]
                        },
                        {
                            value: 'suzhou',
                            label: '苏州',
                            children: [
                                {
                                    value: 'zhuozhengyuan',
                                    label: '拙政园',
                                },
                                {
                                    value: 'shizilin',
                                    label: '狮子林',
                                }
                            ]
                        }
                    ],
                }]
		},
		mounted(){
			this.$http.post('<?php echo url("ucenter","getAdres");?>
')
			.then((rtnD)=>{
				this.addr_list = rtnD.data
			})
		},
		methods:{
			add(){
				this.$http.post('<?php echo url("ucenter","saveAdres");?>
',{
					receive_people:this.receive_people,
					area:JSON.stringify(this.area),
				}).
				then((rtnD)=>{
					if (rtnD.data.status == 1) {
						this.addr_list.unshift({
							receive_people:this.receive_people,
							area:rtnD.data.area,
						})
					}
				})
			},
			remove(n){
				this.addr_list.splice(n,1)
			},
			edit(item){
				this.receive_people = item.receive_people

				// jiangsu|nanjing|fuzimiao
				// [ "jiangsu", "nanjing", "fuzimiao" ]
				this.area = item.area.split('|')
				this.show = true
			}
		}
	})
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
