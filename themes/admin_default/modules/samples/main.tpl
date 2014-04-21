<!-- BEGIN: main -->
	<div style="color:#f00;">
		{error}
	</div>
	<form action="" method="post" onsubmit="return checkvalue()">
		<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
		<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
		<table class="tab1">
			<tbody>
				<tr>
					<td>{LANG.full_name}:<span style="color:#f00">(*)</span></td>
					<td><input type="text" name="full_name" value="{DATA.full_name}"  /></td>
				</tr>
			</tbody>
			<tbody class="second">
				<tr>
					<td>{LANG.phone}:<span style="color:#f00">(*)</span></td>
					<td><input type="text" name="phone" value="{DATA.phone}"  /></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td>{LANG.age}:</td>
					<td><input type="text" name="age" value="{DATA.age}"  /></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td>Gioi tinh:</td>
					<td>
						<input {ck_male} type="radio" name="sex" value="0"  /> Nam
						<input {ck_fmale} type="radio" name="sex" value="1"  /> Nu
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td>Trinh do:</td>
					<td>
						<select name="trinhdo">
							<option value="-1">------</option>
							﻿<!-- BEGIN: loop -->
							<option {LEVEL.sl} value="{LEVEL.key}">{LEVEL.value}</option>
							﻿<!-- END: loop -->
						</select>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2">
						<input name="submit" type="submit" value="{LANG.save}" />
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
	<script type="">
		function checkvalue(){
			var full_name = $("input[name=full_name]").val();
			var phone = $("input[name=phone]").val();
			var age = $("input[name=age]").val();
			if( full_name == '' ){
				alert('{LANG.error_full_name}');
				$("input[name=full_name]").focus();
				return false;
			}else if( phone == ''){
				alert('{LANG.error_phone}');
				$("input[name=phone]").focus();
				return false;
			}else if( isNaN( phone ) ){
				alert('Khong phai la so');
				$("input[name=phone]").focus();
				return false;
			}else if ( age != '' && isNaN( age )){
				alert('ban can nhpa so tuoi');
				return false;
			}
			return true;
		}
	</script>
<!-- END: main -->
