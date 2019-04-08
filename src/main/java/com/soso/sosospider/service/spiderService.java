package com.soso.sosospider.service;

import cn.edu.hfut.dmic.contentextractor.News;
import com.soso.sosospider.dao.redisDao;
import com.soso.sosospider.util.MD5Utils;
import com.soso.sosospider.util.SpiderContextService;
import org.apache.tomcat.util.security.MD5Encoder;
import org.jsoup.Connection;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import redis.clients.jedis.Jedis;
import sun.security.provider.MD5;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

@Service
public class spiderService {
//    对接口输入url，将输出所有的a标签的连接
    @Autowired
    private redisDao redisDao;

    /**
     * 爬虫的处理模块
     * @param seed
     * @param url
     * @return
     */
    public ArrayList<String> geturl(String seed,String url){
        ArrayList<String> urlList=new ArrayList<>();
        System.out.println(url+"爬取的网页");
        Document doc=null;
        try {
            Connection connect  = Jsoup.connect(url);
            Map<String, String> header = new HashMap<String, String>();
            header.put("Host", url);
            header.put("User-Agent", "	Mozilla/5.0 (Windows NT 6.1; WOW64; rv:5.0) Gecko/20100101 Firefox/5.0");
            header.put("Accept", "	text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
            header.put("Accept-Language", "zh-cn,zh;q=0.5");
            header.put("Accept-Charset", "	GB2312,utf-8;q=0.7,*;q=0.7");
            header.put("Connection", "keep-alive");
            Connection data = connect.data(header);
            doc = data.get();

        }catch (Exception e){
            System.out.println("爬取到异常网页结构或者网页不存在");
        }
        Elements links = doc.getElementsByTag("a");
//            对本页的所有url进行去重复
        HashMap<String,Integer> hashMap=new HashMap<>();
        hashMap.put(url,1);
        int num=1;
        for (Element link : links) {
            String linkHref = link.attr("href");
            int re=hashMap.getOrDefault("aa",-1);
            if(re==-1){
                hashMap.put(linkHref,1);
                String md5Href=MD5Utils.md5(linkHref);
                String hrefin=redisDao.getByKey(md5Href);
                if(hrefin!="1"){
//                    该链接未爬取过
                    if(!redisDao.gset(seed+"setall", md5Href)){
                        redisDao.sset(seed+"setall", md5Href);
                        redisDao.lpush(seed,linkHref);
                        System.out.println("入队列成功"+linkHref);
                    }
                }
            }
        }
        SpiderContextService spiderContextService=new SpiderContextService();
        News news=spiderContextService.getContext(doc);

        return urlList;
    }
}
