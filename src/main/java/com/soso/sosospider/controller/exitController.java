package com.soso.sosospider.controller;

import com.soso.sosospider.TestTask.Task;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController

public class exitController {
    //停止进程
//    考虑如何将当前爬取的状态现场保留起来
    @PostMapping("/exit")
    public void exitdetail(@RequestParam("code") String code){
        System.exit(0);
    }
    @PostMapping("/heart")
    public String heart(){
        Task task=new Task();
        try {
            task.doTaskOne();
            task.doTaskThree();
            task.doTaskTwo();
        }catch (Exception e){

        }
        return "alive";
    }
}
