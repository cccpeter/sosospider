package com.soso.sosospider.service;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;

import java.util.concurrent.TimeUnit;

@Service
public class AsyncService {

	private static final Logger LOG = LoggerFactory.getLogger(AsyncService.class);


	@Async
	public void task(int i) throws InterruptedException {
		System.out.println("开始调用"+i);
		TimeUnit.SECONDS.sleep(i);
		System.out.println("调用解释"+i);
		LOG.info("线程任务执行结束。。。");
	}
}
