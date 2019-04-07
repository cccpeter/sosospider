package com.soso.sosospider.service;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;

/**
 * @author cpeter
 * 线程启动类
 */
@Service
public class AsyncService {

	private static final Logger LOG = LoggerFactory.getLogger(AsyncService.class);
	@Autowired
	private spiderService spiderService;

	@Async
	public void task(String seed,String url) throws InterruptedException {
//		TimeUnit.SECONDS.sleep(i);
//		seed为队列的名称，为网站的起始链接。
//		url为需要爬取的链接
		spiderService.geturl(seed,url);
		LOG.info("线程任务执行结束");
	}
}
