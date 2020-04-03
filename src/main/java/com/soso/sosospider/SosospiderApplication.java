package com.soso.sosospider;

import org.apache.curator.framework.CuratorFramework;
import org.apache.curator.framework.CuratorFrameworkFactory;
import org.apache.curator.retry.RetryNTimes;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.scheduling.annotation.EnableAsync;


@SpringBootApplication
//异步的注解
@EnableAsync
public class SosospiderApplication {

    public static void main(String[] args) {
        SpringApplication.run(SosospiderApplication.class, args);
    }

//    @Bean
//    public CuratorFramework curatorFramework() {
//        return CuratorFrameworkFactory.newClient("127.0.0.1:2181", new RetryNTimes(5, 1000));
//    }

}
