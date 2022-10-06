<h4>Dear <b>Receiver [<?= $nama; ?>]</b>,</h4>
			<div>
				Your Non-conformity Report  Has Been Completed by<b> Putra Pardede</b>.<br>Please read the information about request below. <br>
				<br><br>
				<table border='1px' style='border-style: solid; width: 1200px'>
				<caption style='background-color:#0fd92f;color: black; font-weight: bold;  padding: 2px 0; font-size: 18px'>CAR: Corrective Action Request No.<?= $car['car_no']; ?></caption>
					<tr style='background-color: #0fd92f; color: black; margin-left:10px'>
						<th style='padding: 5px'>Car No</th>
						<th style='padding: 5px'>Ref.Document No</th>
						<th style='padding: 5px'>Open By Department</th>
						<th style='padding: 5px'>Open Date</th>
						<th style='padding: 5px'>Costumer</th>
						<th style='padding: 5px'>Action To</th>
						<th style='padding: 5px'>Status</th>
					</tr>
					<tr>
						<td style='padding: 5px' align="center"><?= $car['car_no']; ?></td>
						<td style='padding: 5px' align="center"><?= $car['ref_doc_no']; ?></td>
						<td style='padding: 5px' align="center"><?= $car['open_by_dept']; ?></td>
						<td style='padding: 5px' align="center"><?= $car['open_date']; ?></td>
						<td style='padding: 5px' align="center"><?= $car['constumer']; ?></td>
						<td style='padding: 5px' align="center"><?= $car['act_to_dept']; ?></td>
						<td style='padding: 5px' align="center">Closed</td>
					</tr>
				</table>
				<br>
				<ul>
                    <li>To view the detailed <b><i>report</i></b>, please download via this 
						<a href="http://<?=$_SERVER['HTTP_HOST']?>/ncr_baru/reports/export_report?doc_format=pdf&id_car=<?=$car['id_car']?>&report_type=car">link</a>
                    </li>
				</ul>  
                     <a href='http://<?=$_SERVER['HTTP_HOST']?>/ncr_baru/'>Non-Conformity Report System </a> 
			</div><br>

		Best Regards,
	
		<br><br><br><br>
	
		<b>Employee Management Root System</b>
				
		<p class=MsoNormal><b><span style="font-size:14.0pt;font-family:
		'Arial Black',sans-serif;color:#0F439B;">RIGHT FIRST TIME<o:p></o:p></span></b></p>

		<p class=MsoNormal><b><span style="font-size:12.0pt;font-family:
		'Arial Black',sans-serif;color:#0F439B;">&nbsp; HOME EVERY TIME<o:p></o:p></span></b></p>
				
		<hr><p style="font-style: italic; color: blue">
		From <b>PT. Citra Tubindo Engineering (CTE)</b>:
		<br>
		<b style="font-size: 16px">IMPORTANT:</b> The information in this electronic mail (email) transmission, including any attachment, is the property of <b>CTE</b>.
		It is intended for the use of the individual or entity to which it is addressed, and may contain information that is privileged, <b>CONFIDENTIAL</b>, and exempt from disclosure under applicable law.
		<br>If you are not the intended recipient, you are hereby notified that any disclosure, copying, distribution, use of, or reliance on, the contents of this email transmission is prohibited.
		Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. <b>THANK YOU</b>.
		</p>