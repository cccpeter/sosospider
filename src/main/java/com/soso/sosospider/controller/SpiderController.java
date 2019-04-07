package com.soso.sosospider.controller;

import com.soso.sosospider.service.AsyncService;
import com.soso.sosospider.startup.SpiderStartUp;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;


@RestController

public class SpiderController {
    //停止进程
//    考虑如何将当前爬取的状态现场保留起来seed
    @Autowired
    private AsyncService asyncService;
    @Autowired SpiderStartUp spiderStartUp;
    @PostMapping("/exit")
    public void exitdetail(@RequestParam("code") String code){

        System.exit(0);
    }
//    心跳包
    @PostMapping("/heart")
    public String heart(){
        return "alive";
    }
//    爬虫的主城
//    主程处于爬取状态的堵塞状态，无需做返回处理（如何做心跳包？）
    @PostMapping("/getwebaddr")
    public void getwebaddr(@RequestParam("webaddr") String webaddr){
        spiderStartUp.startUpWebSpider(webaddr);
    }
}
