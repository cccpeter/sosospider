package com.soso.sosospider.controller;

import com.soso.sosospider.service.AsyncService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;


@RestController

public class exitController {
    //停止进程
//    考虑如何将当前爬取的状态现场保留起来seed
    @Autowired
    private AsyncService asyncService;
    @PostMapping("/exit")
    public void exitdetail(@RequestParam("code") String code){

        System.exit(0);
    }
//    心跳包
    @PostMapping("/heart")
    public String heart(){
        long start = System.currentTimeMillis();
        try{
            for(int i=0;i<120;i++) {
                asyncService.task(i);
            }
        }catch (Exception e){
            System.out.println(e);
        }
        long end = System.currentTimeMillis();
        System.out.println(end-start);
        return "alive";
    }
}
