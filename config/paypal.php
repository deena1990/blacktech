<?php 
return [ 
    // our sandbox keys start
    'client_id' => 'ASODtB2Ds-g4plVae2Z3_qZUK4XV-ul8HP6nPpLaTMBG_2ziPGqfI_IWcta1I51C3x0Ys-5NBhylnojx',
	'secret' => 'EJeSYMTdl_I7v_8_7TmztNnX0QmE2mf_5cvy2woxeTo5PEQuvuCVMO1GUUL94WKxVu4dR7BWyy2mRC2B',
    // our sandbox keys end
    // client sandbox keys start
    // 'client_id' => 'AZBkFCGAi4Ri_hBCEPIIisDAc0OvYAeBxpE9h7zg22lJPjQMwTQi46ukUvV9dTwMr-MjNzIgOzptVyG3',
	// 'secret' => 'ELacDXN1iLbcvUpmCVZosAc9n8IvCCKnHe_w9gqaJ90pFoD5aoZ-HtjaP4z4BIgjaRXnHtpxbZ4Lrj2R',
    // client sandbox keys end
    // client live keys start
    // 'client_id' => 'Ade0BiGJ3VJJGWUPb6qLkdpNrCs0Oe12A5ekhrlhTw2nQiPl0ZYRogBXwUErkJ78pzI65lWTR2kvbEw5',
	// 'secret' => 'EHvi1avmUa8NjC-WcmM_nMuZwdz9ou6sizxw6beuwlsM0BFKqT9MckGfKWH8JYygFCsghUy7Zp8iHUcR',
    // client live keys end
    'settings' => array(
        'mode' => 'sandbox',
        // 'mode' => 'live',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];