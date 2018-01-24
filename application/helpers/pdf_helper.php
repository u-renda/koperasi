<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pdf_create')) {
    function pdf_create($param, $file_name)
    {
		$CI =& get_instance();
		$CI->load->library("Pdf");
		
		// create new PDF document
		$pdf = new TCPDF();    
	  
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage(); 
	  
		// Set some content to print
		$html_file = '';
		
		if ($file_name == 'angsuran')
		{
			$html_file = angsuran_invoice($param);
		}
		
		$html = $html_file;
		
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	  
		// ---------------------------------------------------------    
		
		// Clean any content of the output buffer
		ob_end_clean();

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
	}
}

if ( ! function_exists('angsuran_invoice')) {
    function angsuran_invoice($param)
    {
		$CI =& get_instance();
		
		$html = '
		<html>
			<head></head>
			<body>
				<table style="border: 1px solid;">
					<tr>
						<td style="border: 1px solid;">
							<img src="'.base_url('assets/images').'/logo.png'.'" alt="'.$CI->config->item('title').'" width="50" style="text-align: right;" />
						</td>
						<td style="border: 1px solid; text-align: right;">
							<h2 style="margin-top: 0; margin-bottom: 10px;">BUKTI PEMBAYARAN</h2>
							<h4 style="margin: 0 !important; font-weight: 700;">#'.$param['angsuran']->no_angsuran.'</h4>
						</td>
					</tr>
				</table>
			</body>
		</html>
		';
		
		return $html;
	}
}