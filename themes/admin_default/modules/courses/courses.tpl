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
				<td>{LANG.makh}:<span style="color:#f00">(*)</span></td>
				<td>
				<input type="text" name="makh" value="{DATA.makh}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.tenkh}:<span style="color:#f00">(*)</span></td>
				<td>
				<input id="idtitle" type="text" name="tenkh" value="{DATA.tenkh}"  />
				</td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td>{LANG.alias}:<span style="color:#f00">(*)</span></td>
				<td>
				<input id="idalias" type="text" name="alias" value="{DATA.alias}"  onclick="get_alias();"/>
				
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.lichkh}:<span style="color:#f00">(*)</span></td>
				<td>
				<input type="text" name="lichkh" value="{DATA.lichkh}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.thoiluong}(Buổi):<span style="color:#f00">(*)</span></td>
				<td>
				<input type="text" name="thoiluong" value="{DATA.thoiluong}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.hocphi}(Đồng):<span style="color:#f00">(*)</span></td>
				<td>
				<input type="text" id="hocphi" name="hocphi" value="{DATA.hocphi}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.slhv}:<span style="color:#f00">(*)</span></td>
				<td>
				<input type="text" name="slhv" value="{DATA.slhv}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.timestart}:<span style="color:#f00">(*)</span></td>
				<td>
				<input id="timestart" name="timestart"  type="text"  value="{DATA.timestart}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.timeend}:</td>
				<td>
				<input id="timeend" type="text" name="timeend" value="{DATA.timeend}"  />
				</td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.note}:</td>
				<td><textarea name="note" rows="5" cols="80" maxlength="255" placeholder="Nhập ghi chú" wrap="hard" style="width: auto">{DATA.note}</textarea></td>
			</tr>
		</tbody>

		<tbody>
			<tr>
				<td>{LANG.status}:</td>
				<td>
				<input {ck_1} type="radio" name="status" value="1"  />
				Đang hoạt động
				<input {ck_0} type="radio" name="status" value="0"  />
				Đã kết thúc </td>
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
	function checkvalue() {
		var makh = $("input[name=makh]").val();
		var tenkh = $("input[name=tenkh]").val();
		var lichkh = $("input[name=lichkh]").val();
		var hocphi = $("input[name=hocphi]").val();
		var thoiluong = $("input[name=thoiluong]").val();
		var slhv = $("input[name=slhv]").val();
		var note = $("input[name=note]").val();
		var timestart = $("input[name=timestart]").val();
		var timeend = $("input[name=timeend]").val();
		var status = $("input[name=status]").val();

		if (makh == '') {
			alert('{LANG.error_makh}');
			$("input[name=makh]").focus();
			return false;
		} else if (tenkh == '') {
			alert('{LANG.error_tenkh}');
			$("input[name=tenkh]").focus();
			return false;
		} else if (lichkh == '') {
			alert('{LANG.error_lichkh}');
			$("input[name=lichkh]").focus();
			return false;
		} else if (thoiluong == '') {
			alert('{LANG.error_thoiluong}');
			$("input[name=thoiluong]").focus();
			return false;
		} else if (isNaN(thoiluong)) {
			alert('{LANG.error_thoiluong_nan}');
			$("input[name=thoiluong]").focus();
			return false;
		} else if (hocphi == '') {
			alert('{LANG.error_hocphi}');
			$("input[name=hocphi]").focus();
			return false;
		} else if (isNaN(hocphi1)) {
			alert('{LANG.error_hocphi_nan}');
			$("input[name=hocphi]").focus();
			return false;
		} else if (slhv == '') {
			alert('{LANG.error_slhv}');
			$("input[name=slhv]").focus();
			return false;
		} else if (isNaN(slhv)) {
			alert('{LANG.error_slhv_nan}');
			$("input[name=slhv]").focus();
			return false;
		} else if (timestart == '') {
			alert('{LANG.error_timestart}');
			$("input[name=timestart]").focus();
			return false;
		} else if (timeend == '') {
			alert('{LANG.error_timeend}');
			$("input[name=timeend]").focus();
			return false;
		} else if (status == '') {
			alert('{LANG.error_status}');
			$("input[name=status]").focus();
			return false;
		} else if (isNaN(hocphi)) {
			alert('Khong phai la so');
			$("input[name=hocphi]").focus();
			return false;
		} else if (age != '' && isNaN(age)) {
			alert('ban can nhpa so tuoi');
			return false;
		}
		return true;
	}
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!--<script src="{NV_BASE_SITEURL}modules/{MODULE_NAME}/js/jquery.maskedinput-1.3.min.js"></script>
<script src="{NV_BASE_SITEURL}modules/{MODULE_NAME}/js/jquery-1.5.2.min.js"></script>-->

<script src="{NV_BASE_SITEURL}modules/{MODULE_NAME}/js/jquery.maskedinput.min.js"></script>
<script src="{NV_BASE_SITEURL}modules/{MODULE_NAME}/js/jquery.formatCurrency-1.4.0.min.js"></script>

<script> 
// Format while typing & warn on decimals entered, no cents
			$('#hocphi').blur(function() {
				$(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0,symbol:'' });
			})
			.keyup(function(e) {
				var e = window.event || e;
				var keyUnicode = e.charCode || e.keyCode;
				if (e !== undefined) {
					switch (keyUnicode) {
					default: $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true,symbol:'' });
					}
				}
			});

</script> 

<script> // tạo mask cho input
		jQuery(function($){
		       $("#hocphi1").mask("?**.999.***");
		});
</script> 

<script> // tạo lịch cho timestart
	$(function() {
		$("#timestart").datepicker();
		$("#timeend").datepicker();
	}); 
</script>


<script type="text/javascript"> // tạo alias khi title thay doi 

$("#idtitle").change(function() {
	get_alias("courses",0);
});


</script>

<!-- END: main -->
