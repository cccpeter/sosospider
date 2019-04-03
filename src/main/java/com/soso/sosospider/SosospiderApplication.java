package com.soso.sosospider;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.scheduling.annotation.EnableAsync;


@SpringBootApplication
//异步的注解
@EnableAsync
public class SosospiderApplication {

    public static void main(String[] args) {
        SpringApplication.run(SosospiderApplication.class, args);
    }

}
