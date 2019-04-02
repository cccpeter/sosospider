package com.soso.sosospider.service;

import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;

@Service
public class TaskImpl {
    @Async
    public void executeAsyncTask(Integer i){
        System.out.println("执行异步任务"+i);
    }
    @Async
    public  void  executeAsyncTaskplus(Integer i){
        System.out.println("执行异步任务"+(i+i));
    }

}