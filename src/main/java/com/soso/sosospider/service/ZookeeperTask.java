package com.soso.sosospider.service;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;

/**
 * @Author: Oliver
 * @Desc: desc
 * @Date: cretead in 2020/4/3 17:03
 * @Last Modified: by
 * @return value
 */
@Service
public class ZookeeperTask {
    private static final Logger LOG = LoggerFactory.getLogger(AsyncService.class);

    @Autowired
    ZooKeeperImpl zooKeeper;
    @Async
    public void task(String product){
        try {
            zooKeeper.makeOrder(product);
        }catch (Exception e){
            e.printStackTrace();
        }
    }
}
