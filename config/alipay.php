<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101900723528",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAo8c6bZVmIrQ6DNFkNteSUdxeoFrjjIGS5lMzQTO6cr8qM/fSMLRYCHWow17DRdyRMoEoxYqMIE5nseVGlOPh/UHlbNhnmDPLyGfUraydLmdssl3zmQO8NAcRxllTNArsQSjlcCe44iYi8JZToYBVx5mBSmtHPEwk/DE4hszUCXtjd9GenMtHsojCxrukSv7DuBcrth8tRbOG65w3OZAWkCblB1l1eIzjgM297PsdVHyg7VXhnfMztrSzULHTOhRS+veQd5FjQm7oaqD+04DtIiKCa+Mi7idLDI2pUmfi2gKpgwFWN2XWo3tMJKh7QiWnciNQkn8W+8ejTufWknKAgwIDAQABAoIBAH1u64fcIUI5CDCi+f6qsayye2KS2a3V2z09wYaRaJ3TXS46Aig9JyMrgdpHrITH/ghRNXm9t75SbkaoE5uawI0nt9/aCdVe7hcJtrBhAGz21x/wps2tN6odM/bWmMvGBdWNzdNNCONjU+UxLNIHKStanNPzP7allrnztJhBLbAoKpG/GC28ahlxEFaZMKc2+HLAE40y7tJmta/yOPZ80f14LEXma6ey4GxoAiuVqhzinW8yTSe4QkFi/vUC/n+hNRL13Y8pVej4n5QsfaVwGUIEBLu1omb9HZvNqyuVeSimOZwAcPb9EwbAVuuJVdhqT62vUvEh1sZxjypEMFvjHUECgYEA9KBxs5MkR7D64WEJ6Ta9aoQBYwcltIM0MQCT4zztX/pj8qRqrZiZtmD9b3H0VbPJqd9N4gNLBEo4OmIgcby1X9prGfSxGNlalZE0pxuGzD2s4id2HdzIX/mNHtC6x5tMzJNgbX9hb1UpV5tswEuQdiiFZEzvwo2AE0Rc0c3ZxKMCgYEAq2SFv11V0wRWkZWMPLJHub5csncSlea3lNeoKtBCRimVQnDKtq+m/1O+LVc/plsHuwpXB/ajlbuV775gEtBw8fQF9HAU/zcJmZd4gLHnZYbY0CfPrLEJ3MX7Gq+d1RGyvDdlETfch3rHFza2zIZdaj91AUmr/nlIyJwRhqbyMqECgYBnHkMPuZTvi5EV9HvjDSonfmG/RsIEJ9KWXXH5tjMx5DDBlcFKUCtrj9MFaXnfrpvxuanw/gZfVpIBOmAG0c97Cm1fUaBdozHmHoGdd6MI8W6xHoVR7UGiA2YTeVVi0vo6ul1Jiwqdjb6RqXjcTn4k8MvaDfx7fH5ioMynvChyFQKBgDO34aQdRginBnhn6Cloorwp9U7lH3acaElByj0hGt6RLbke0AzQdFQXsQt9iHdqgKqwNBLzGenU8SmnCNakj3BzcliQecWJlhwC2Rn8lRbN2h715HT390HnfB5RYA8riAPDs3u+n41CP1GB8SdGZGnrPCNnV78yWgQvFBrNxcgBAoGBANY+5jdiWeJekCYk25QsXzNGCz16Im/gtquGh89eSkrm6Bsxz4HBHl3V6VHgG+2kEJTubN/xHylD/BACmAAlu1AUfnroKPfW58ax1oInwzr5wuTmI1Rv43hL1r7G24e5/HnWxdboTnUcG3r1070UPagFqewt4hfJLpC9iE/VNsTf",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.yans.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq+uet1zAg/TrFT74ceQ3Wxvzj0MQFD8sIL/MVuhAt916i5PQrvC8lL7rGjjkXQB875km7zQ/dqGL+a+kWQPcSS7IM2DqtDQbMIiK1qAZDD8ye9B8va5ZJuOzrsg9YAnPfqhUXENNYSRKMMa1uri0nPb2GxlfQV0Vs4PKKQ5c5KfR0WN0MvU9Aqh+gLe8LPaJuSiFHJS4DbL2fq/TC8J24tzZn5h8p2jo1RL10gM36wN7rCcMZhwprTV3zhE083KRlN1616L+ATJ3QsdjF40MoVE9iR2p5opFF6J4pC0xC+3LkbN/FA3FniRjzJwRp+lD+3+eSo+o2bzGCcVlaMeTCQIDAQAB",
		
	
);