package com.soso.sosospider.service;


import lombok.extern.slf4j.Slf4j;
import org.apache.curator.framework.CuratorFramework;
import org.apache.curator.framework.recipes.locks.InterProcessMutex;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.concurrent.TimeUnit;
import java.util.logging.Logger;

/**
 * @Author: Oliver
 * @Desc: desc
 * @Date: cretead in 2020/4/3 15:42
 * @Last Modified: by
 * @return value
 */
@Service
@Slf4j
public class ZooKeeperImpl {

    private static final String lockPath = "/lock/order";
    @Autowired
    private CuratorFramework zkClient;

    /**
     * @Author: Oliver
     * @Desc: 模拟分布式锁过程
     * @Date: cretead in 2020/4/3 15:41
     * @Last Modified: by
     * @return value
     */
    public void makeOrder(String product) {
        Logger.getGlobal().info("try do job for " + product);
        String path = lockPath + "/" + product;
        long time1 = System.currentTimeMillis();
        Date date1 = new Date();
        try {
            // InterProcessMutex 构建一个分布式锁
            InterProcessMutex lock = new InterProcessMutex(zkClient, path);

            try {
                if (lock.acquire(5, TimeUnit.HOURS)) {
                    // 模拟业务处理耗时5秒
                    Thread.sleep(5*1000);
                    Logger.getGlobal().info("do job " + product + "done");
                }
            } finally {
                // 释放该锁
                lock.release();
            }

        } catch (Exception e) {
            // zk异常
            e.printStackTrace();
        }
        long time2 = System.currentTimeMillis();
        Date date2 = new Date();
        System.out.println("运行时间："+String.valueOf(time2-time1));
        System.out.println("第一次时间:"+date1+"第二次时间:"+date2);
    }



}