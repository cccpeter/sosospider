package com.soso.sosospider.service;

import cn.edu.hfut.dmic.contentextractor.News;
import com.soso.sosospider.dao.redisDao;
import com.soso.sosospider.util.SpiderContextService;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.HashMap;

@Service
public class spiderService {
//    对接口输入url，将输出所有的a标签的连接
    @Autowired
    private redisDao redisDao;
    public ArrayList<String> geturl(String url){
        ArrayList<String> urlList=new ArrayList<>();
        Document doc=null;
        try {
            doc = Jsoup.connect(url).get();

        }catch (Exception e){
            System.out.println("爬取到异常网页结构或者网页不存在");
        }
        Elements links = doc.getElementsByTag("a");
//            对本页的所有url进行去重复
        HashMap<String,Integer> hashMap=new HashMap<>();
        hashMap.put(url,1);
        for (Element link : links) {
            String linkHref = link.attr("href");
//                String linkText = link.text();
            int re=hashMap.getOrDefault("aa",-1);
            if(re==-1){
                hashMap.put(linkHref,1);
//                    Jedis jedis=new Jedis("39.108.106.29:6379");
                redisDao.save(linkHref,"1");
                System.out.println(linkHref);
                System.out.println(redisDao.getByKey(linkHref));
            }
//            System.out.println(linkHref);
        }
        SpiderContextService spiderContextService=new SpiderContextService();
        News news=spiderContextService.getContext(doc);

        return urlList;
    }
}
