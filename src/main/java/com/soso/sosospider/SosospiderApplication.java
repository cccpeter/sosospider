package com.soso.sosospider;

import com.soso.sosospider.TestTask.Task;
import com.soso.sosospider.service.TaskImpl;
import com.soso.sosospider.util.AsyncConfig;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.scheduling.annotation.EnableAsync;
import org.springframework.scheduling.concurrent.ThreadPoolTaskExecutor;

import java.util.concurrent.Executor;
import java.util.concurrent.ThreadPoolExecutor;

@SpringBootApplication
@EnableAsync
//@ComponentScan("com.soso.sosospider.TestTask")
public class SosospiderApplication {

    public static void main(String[] args) {

        SpringApplication.run(SosospiderApplication.class, args);
//        AnnotationConfigApplicationContext context=new AnnotationConfigApplicationContext(AsyncConfig.class);
//        TaskImpl task=context.getBean(TaskImpl.class);
//        for(int i=0;i<10;i++){
//            task.executeAsyncTask(i);
//            task.executeAsyncTaskplus(i);
//        }

    }
    @EnableAsync
    @Configuration
    class TaskPoolConfig {

        @Bean("taskExecutor")
        public Executor taskExecutor() {
            ThreadPoolTaskExecutor executor = new ThreadPoolTaskExecutor();
            executor.setCorePoolSize(10);
            executor.setMaxPoolSize(20);
            executor.setQueueCapacity(200);
            executor.setKeepAliveSeconds(60);
            executor.setThreadNamePrefix("taskExecutor-");
            executor.setRejectedExecutionHandler(new ThreadPoolExecutor.CallerRunsPolicy());
            return executor;
        }
    }

}
