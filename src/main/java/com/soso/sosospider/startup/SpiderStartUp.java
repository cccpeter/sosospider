package com.soso.sosospider.startup;

import com.soso.sosospider.service.AsyncService;
import com.soso.sosospider.service.spiderService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;

import javax.annotation.PostConstruct;

/**
 * @author cpeter
 * spider enter
 */
@Service
public class SpiderStartUp {
	@Autowired
	private AsyncService asyncService;
	@Autowired
	private spiderService spiderService;
	@Autowired
	private com.soso.sosospider.dao.redisDao redisDao;
	public boolean startUpWebSpider(String webAddr){
		boolean result=true;
		try{
//			first，单次爬取首页的所有链接入redis,seed为起始链接
			String seed=webAddr;
			spiderService.geturl(seed,webAddr);
//          sencond,AsyncSpider Task running
//			while (true){
//				for(int i=0;i<10;i++) {
//					String url = redisDao.rpop(seed);
//					asyncService.task(seed, url);
//				}
//				Thread.sleep(5000);
//			}

		}catch (Exception e){
			System.out.println(e);
		}
		return result;
	}
	@PostConstruct
	public void init() {
		SpiderStartUp spiderStartUp = new SpiderStartUp();
		spiderStartUp=this;
		spiderStartUp.asyncService = this.asyncService;
	}
}
