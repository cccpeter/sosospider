package com.soso.sosospider.util;

import cn.edu.hfut.dmic.contentextractor.ContentExtractor;
import cn.edu.hfut.dmic.contentextractor.News;
import org.jsoup.nodes.Document;

public class SpiderContextService {
    public News getContext(Document document){
        News news=new News();
        try {
//            System.out.println(document);
            news = ContentExtractor.getNewsByDoc(document);
//            System.out.println("爬取网址：" + news.getUrl());
//            System.out.println("发布时间：" + news.getTime());
//            System.out.println("文章标题：" + news.getTitle());
//            System.out.println("文章内容：" + news.getContent());
        }catch (Exception e){
            System.out.println(e);
        }
        return news;
    }
}
