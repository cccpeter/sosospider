package com.soso.sosospider.service;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;

import java.util.concurrent.TimeUnit;

@Service
public class AsyncService {

	private static final Logger LOG = LoggerFactory.getLogger(AsyncService.class);
	@Autowired
	private spiderService spiderService;

	@Async
	public void task(String url) throws InterruptedException {
		System.out.println("开始调用");
//		TimeUnit.SECONDS.sleep(i);
		spiderService.geturl(url);
		LOG.info("线程任务执行结束。。。");
	}
}
