//
//  ViewController.m
//  RSA
//
//  Created by zhangwenzhao on 2017/5/31.
//  Copyright © 2017年 zhangwenzhao. All rights reserved.
//

#import "ViewController.h"
#import "RSA.h"
#import "Base64.h"

@interface ViewController ()

@end

@implementation ViewController

- (void)viewDidLoad {
    [super viewDidLoad];
    
    
    //这是公钥地址，请确保数据最后一行没有回车
    NSString* publickeyPath =  [[NSBundle mainBundle] pathForResource:@"rsa_public_key" ofType:@"txt"];
    NSString* publickey = [NSString stringWithContentsOfFile:publickeyPath encoding:NSUTF8StringEncoding error:NULL];
    
    //    服务器地址，返回base64编码过的字符串
    NSString* encWithPubKeyUrl =@"http://192.168.0.108:8099/rsa.php";
    
    NSString *encWithPubKey = [NSString stringWithContentsOfURL:[NSURL URLWithString:encWithPubKeyUrl] encoding:NSUTF8StringEncoding error:NULL];
    
//   开始rsa解密，请确保揭秘字符串长度在rsa有效长度内
    NSString* decWithPubStr =  [RSA decryptString:encWithPubKey publicKey:publickey];
    NSLog(@"%@",decWithPubStr);
}


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


@end
