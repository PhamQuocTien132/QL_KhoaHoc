<!-- BEGIN: main -->

<form name="block_list" action="http://localhost/nukeviet-develop/admin/index.php?language=vi&nv=courses&op=courses" method="get">
	<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
	<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
	
	
	<table class="tab1">
		<thead>
			<tr>
				
				<td class="center"><input name="check_all[]" type="checkbox" value="yes" onclick="nv_checkAll(this.form, 'idcheck[]', 'check_all[]',this.checked);" /></td>
				<td><a href="{base_url_name}">{LANG.tenkh}</a></td>
				<td><a href="{base_url_name}">{LANG.makh}</a></td>
				<td><a href="{base_url_name}">{LANG.note}</a></td>
				<td><a href="{base_url_name}">{LANG.status}</a></td>
				<td><a href="{base_url_name}">{LANG.function}</a></td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody class="center">
			<!-- BEGIN: loop -->
			<tr>
				<input type="hidden" name="id" value="{ROW.id}" />
				<td><input type="checkbox" onclick="nv_UncheckAll(this.form, 'idcheck[]', 'check_all[]', this.checked);" value="{ROW.id}" name="idcheck[]" /></td>
				<td class="left"><a target="_blank" href="#">{ROW.name_courses}</a></td>
				<td>{ROW.id_courses}</td>
				<td>{ROW.note}</td>
				<td>{ROW.status}</td>
				<td> <a href="http://localhost/nukeviet-develop/admin/index.php?language=vi&nv=courses&op=edit_courses&id={ROW.id}">Sửa</a> | <a href="#">Xóa</a> </td>
			</tr>
			<!-- END: loop -->
		</tbody>
		
	</table>
</form>
<!-- BEGIN: generate_page -->
<br />
<p class="center">
	{GENERATE_PAGE}
</p>
<!-- END: generate_page -->
<!-- END: main -->