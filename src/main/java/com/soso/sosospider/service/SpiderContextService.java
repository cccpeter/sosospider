package com.soso.sosospider.service;

import cn.edu.hfut.dmic.contentextractor.ContentExtractor;
import cn.edu.hfut.dmic.contentextractor.News;
import org.springframework.stereotype.Service;

@Service
public class SpiderContextService {
    public News getContext(){
        News news=new News();
        try {
            news = ContentExtractor.getNewsByUrl("http://119.29.189.104:81");
            System.out.println("爬取网址：" + news.getUrl());
            System.out.println("发布时间：" + news.getTime());
            System.out.println("文章标题：" + news.getTitle());
            System.out.println("文章内容：" + news.getContent());
        }catch (Exception e){
            System.out.println(e);
        }
        return news;
    }
}
