<h4 align='right' >Batam, <?= date("d-M-Y",strtotime($ncr['tgl'])); ?></h4>
<h4>Dear <b>Receiver, [<?= $ncr['not_to']; ?>]</b>,</h4>
			<div>
                You are the recipient of an application from the Non-Conformity <b>and waiting for your reply</b><br>
                Please read the information about the report below.
				<br>
				<br>
                <br>
				<table border='1' style='border-style: solid; margin: 5px; width: 1200px'>
				<caption style='background-color:#c6dd60; color: black; font-weight: bold;  padding: 5px 0; font-size: 18px'>Non-Conformity Report No.<?= $ncr['nc_no']; ?></caption>
					<tr style='background-color: #ffecba; color: black'>
						<th style='padding: 5px'>NC Number</th>
						<th style='padding: 5px'>Date</th>
						<th style='padding: 5px'>Origator</th>
						<th style='padding: 5px'>Area Under Review</th>
						<th style='padding: 5px'>Ref. Document</th>
						<th style='padding: 5px'>Project</th>
						<th style='padding: 5px'>Function</th>
						<th style='padding: 5px'>Status</th>
					</tr>
					<tr>
						<td style='padding: 5px' align='center'><?= $ncr['nc_no']; ?></td>
						<td style='padding: 5px'><?= date("d-M-Y",strtotime($ncr['tgl'])); ?></td>
						<td style='padding: 5px'><?= $ncr['origator']; ?></td>
						<td style='padding: 5px'><?= $ncr['aun_rev']; ?></td>
						<td style='padding: 5px'><?= $ncr['ref_doc']; ?></td>
						<td style='padding: 5px' align='center'><?= $ncr['project']; ?></td>
						<td style='padding: 5px'><?= $ncr['funct']; ?></td>
                        <?php if ( $ncr['status_ncr']== 'f') :?>
						<td style='padding: 5px;background-color:yellow;color:blue' align='center'>OPEN</td>
                        <?php endif; ?>

					</tr>
				</table>
				<br>
                <ul>
                    <li>To view the detailed <b>report</b>, please <b>download</b> via this 
						<a href="http://<?=$_SERVER['HTTP_HOST']?>/ncr_baru/Reports/export_report?doc_format=pdf&id_ncr=<?=$ncr['id_ncr']?>&report_type=ncr">link</a>
                    </li>
				</ul>  
                     For the next step, Please sign in to <a href='http://<?=$_SERVER['HTTP_HOST']?>/ncr_baru/'>Non-Conformity Report System </a> to deliver your reply .
			</div><br>

		Best Regards,
	
		<br><br><br><br>
	
		<b>Non-Conformity Report System</b>
				
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
		Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system.
		</p>
