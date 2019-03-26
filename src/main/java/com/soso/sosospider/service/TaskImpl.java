package com.soso.sosospider.service;

import lombok.extern.slf4j.Slf4j;
import org.slf4j.Logger;
import org.slf4j.helpers.NOPLogger;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;

import java.util.Random;

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