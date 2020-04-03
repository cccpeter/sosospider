package com.soso.sosospider.service;
import lombok.extern.slf4j.Slf4j;
import org.apache.curator.RetryPolicy;
import org.apache.curator.framework.CuratorFramework;
import org.apache.curator.framework.CuratorFrameworkFactory;
import org.apache.curator.retry.ExponentialBackoffRetry;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.util.ArrayList;
import java.util.HashMap;

@Configuration
@Slf4j
public class ZooKeeperConf {

    @Value("${zk.url}")
    private String zkUrl;

    @Bean
    public CuratorFramework getCuratorFramework() {
        // 用于重连策略，1000毫秒是初始化的间隔时间，3代表尝试重连次数
        RetryPolicy retryPolicy = new ExponentialBackoffRetry(1000, 3);
        CuratorFramework client = CuratorFrameworkFactory.newClient(zkUrl, retryPolicy);
        //必须调用start开始连接ZooKeeper
        client.start();


//        /**
//         * 使用Curator，可以通过LeaderSelector来实现领导选取；
//         * 领导选取：选出一个领导节点来负责其他节点；如果领导节点不可用，则在剩下的机器里再选出一个领导节点
//         */
//        // 构造一个监听器
//        LeaderSelectorListenerAdapter listener = new LeaderSelectorListenerAdapter() {
//            @Override
//            public void takeLeadership(CuratorFramework curatorFramework) throws Exception {
//                log.info("get leadership");
//                // 领导节点，方法结束后退出领导。zk会再次重新选择领导
//
//            }
//        };
//        LeaderSelector selector = new LeaderSelector(client, "/schedule", listener);
//        selector.autoRequeue();
//        selector.start();



        return client;
    }
}
