<?php 

	$app_cfg = array (

		array (

			/*Configuración FTP */ 

		    'host'        	 =>'192.168.1.2',
		    'user'        	 =>'carlos.seda',
		    'password'    	 =>'wsKZtf2QXu',
		    'server_file' 	 =>'table.xls',
		    'local_file'	 =>'csv/table.xls',

		    /*Configuración Conversion*/

		    'file_type'		 =>'Excel5',
		    'codes_csv' 	 =>'csv/accounting_codes.csv',
		    'entries_csv' 	 =>'csv/accounting_entries.csv',

		    /*Configuración Base de datos*/

		    'table_codes'	 =>'codes',
		    'table_accounts' =>'accounts'
		   
		)
	);

	return $app_cfg;

?>