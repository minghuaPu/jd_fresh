<?php
/* Smarty version 3.1.30, created on 2018-08-03 16:43:50
  from "D:\wamp64\www\18shujia\lesson_11\view\ucenter\profile.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b6415c6af6653_19432594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f036630ef5d75a8eb2483ea9faaf81fcf33b439' => 
    array (
      0 => 'D:\\wamp64\\www\\18shujia\\lesson_11\\view\\ucenter\\profile.html',
      1 => 1533285828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.html' => 1,
    'file:ucenter/menu.html' => 1,
  ),
),false)) {
function content_5b6415c6af6653_19432594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style type="text/css">
	.hobby_box li{ border: 2px solid white; margin: 10px;list-style: none; }
	.hobby_box li.choise{ border: 2px solid red ;}

</style>
<div class="container">
	<div class="col-md-3"><?php $_smarty_tpl->_subTemplateRender("file:ucenter/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
	<div class="col-md-9">
		用户资料
		<form action="<?php echo url('ucenter','doProfile');?>
" class="form" method="post">
			<div class="from-group">
				<label >昵称</label>
				<input name="nick_name"  v-model="info.nick_name" type="text" class="form-control"></div>
			<div class="from-group">
				<label>性别</label>
				<label for="">

					<input type="radio" v-model="info.sex" name="sex" value="1"></label>
				男
				<label for="">

					<input type="radio" v-model="info.sex" name="sex" value="2"></label>
				女
			</div>
			<div class="from-group">
				<label>兴趣爱好</label>

				<ul class="row hobby_box">
					<li   class="col-md-3 " v-for="(hb,xb) in hobby" @click="choise(xb)" :class="{ choise:cs_a.indexOf(xb)>-1 }">$hb$</li>
				</ul>
			</div>
			<div class="from-group">
				<input type="hidden" name="hobby" v-model="hobby_ht">
				<input  type="submit" class="btn btn-primary" value="更新"></div>
		</form>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	new Vue({
		el:'.container',
		delimiters:['$','$'],
		data:{
			hobby:JSON.parse('<?php echo $_smarty_tpl->tpl_vars['hobby']->value;?>
'),
			info:JSON.parse('<?php echo $_smarty_tpl->tpl_vars['info']->value;?>
'),
			hobby_ht:"",//传给后台
			cs_a:[],//保存被选中的爱好
		},
		mounted(){
			this.cs_a = this.info.hobby
		},
		methods:{
			choise(n){
				let wz = this.cs_a.indexOf(n)
				if (wz > -1) {
					// 已存在就删掉
					this.cs_a.splice(wz,1)
				}else{
					this.cs_a.push(n)
					this.hobby_ht = this.cs_a.join('|')
					//[0,3,2]
					//0|3|2
				}
				
			}
		}

	})
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
