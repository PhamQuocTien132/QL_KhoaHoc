<!-- BEGIN: main -->
<form onsubmit="return check_value()" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="get" >

	<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />

	{LANG.name}:
	<input type="text" name="name" value="{DATA.name}" />
	<br/>
	<br/>
	{LANG.pass}:
	<input type="text" name="pass" value="{DATA.pass}" />
	<br/>

	<div style="text-align: center">
		<input name="submit" type="submit" value="{LANG.save}" />
	</div>
</form>

<script type="text/javascript">
	function check_value() {
		var name = $("input[name=name]").val();
		var pass = $("input[name=pass]").val();

		if (name == '') {
			alert('chua nhap ten');
			$("input[name=name]").focus();
			return false;
		}
	}
</script>
<!-- END: main -->

<!-- BEGIN
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">

{LANG.name}:<input type="text" name="hoten" value="="{DATA.name}" /> <br/><br/>
{LANG.pass}: <input type="text" name="hoten" value{DATA.name}" /> <br/>

<div style="text-align: center"><input name="submit" type="submit" value="{LANG.save}" /></div>
</form>
main -->