<?php
$private_key = '-----BEGIN PRIVATE KEY-----
MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAM7fi0qQe/JFHhmP
C8+3BqC+NlOrjfScUXX1c+NI0UaH75yHVXMhzI4PWzv86vMT8IRxipJ9UivE269A
79k1+cG8qP0KkfoXygvsPwoM1amkmz815z5qRbG0kSt3Oi8vAwHP51ltQZngpdJa
qJHXGniU4I1g0GEcmAITMPWLdKDhAgMBAAECgYAyZEmt1BwdG7EFUM7zvgWjSjI5
l2Rw3VMKhMvB5Y70u1AmtOCftu/4+syihC1HIOhJms7CeDx35PAOdKb4Jim8E3bc
zyL+lm5qT/AB6wLl4wlfUTrCWSTBcm1RbNKJoAKbiS0giVK8M3o32hRhRkGxkUGz
mPTGIlak7KRHI+RsAQJBAOc+5bhEg1VFE+yVAbu6RWyol2XS3XTLpZMAgNOxSfWu
T/C/pTPLVeTmGRrdlNIUwIjXpQMxWzt7bAyWL89tNJECQQDlBL0aPlzCLr8xd5XV
vo9ruWaqIxMW2J5krgwKKpBiYSVmKxOA7jDlpPx3uRo6Jn/fmDFBU9xDj4tjqKGN
6o9RAkEA1hjozSs5wUfcg40N9sYmIs0QpyiM+ubVXH35yIV7aWjDAK4fAQ5Ab1YO
Zk5CzCKEg+3MDGG1CyRhTGH8z/pW0QJBAJRa630SpNgNnEEZLHDYDuRDp+PS8My9
6m1h6d60D/AK6kUy5mGA6x/4LqwHtpuw0OkxF8cv4eHKHQuj83ORXOECQQCkz4im
SfuxLaQuOZ9/A74q5oY106rONozhhKRsPQSl+0n5ur1/VSnu6npWuAJKpm8jC+mA
ZXuR+oJ2acloozk8
-----END PRIVATE KEY-----';
$public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDO34tKkHvyRR4ZjwvPtwagvjZT
q430nFF19XPjSNFGh++ch1VzIcyOD1s7/OrzE/CEcYqSfVIrxNuvQO/ZNfnBvKj9
CpH6F8oL7D8KDNWppJs/Nec+akWxtJErdzovLwMBz+dZbUGZ4KXSWqiR1xp4lOCN
YNBhHJgCEzD1i3Sg4QIDAQAB
-----END PUBLIC KEY-----';

 
//echo $private_key;
$pi_key =  openssl_pkey_get_private($private_key);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
$pu_key = openssl_pkey_get_public($public_key);//这个函数可用来判断公钥是否是可用的


$data = "我是原始数据，我要经过RSA密";//原始数据
$encrypted = "";
$decrypted = "";


openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密
//  echo  $encrypted;
$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
echo  $encrypted;
 
// openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//私钥加密的内容通过公钥可用解密出来
// echo $decrypted."\n";
?>
