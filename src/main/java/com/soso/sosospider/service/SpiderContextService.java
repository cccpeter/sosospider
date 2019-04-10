package com.soso.sosospider.service;

import cn.edu.hfut.dmic.contentextractor.ContentExtractor;
import cn.edu.hfut.dmic.contentextractor.News;
import com.soso.sosospider.bean.ContextBean;
import com.soso.sosospider.util.UUIDGenerator;
import org.jsoup.nodes.Document;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class SpiderContextService {
    @Autowired
    private ESServiceImpl esService;
    public News getContext(Document document){
        News news=new News();
        try {
//            System.out.println(document);
            news = ContentExtractor.getNewsByDoc(document);
            String url=news.getUrl();
            String title=news.getTitle();
            String time=news.getTime();
            String content=news.getContent();

            String id=UUIDGenerator.getUUID();
            if(url==null){
                url="";
            }
            if(title==null){
                title="";
            }
            if(time==null){
                time="";
            }
            if(content==null){
                content="";
            }
//            elasticCustomerService.saveCustomers(content,time,title,url,id);
            ContextBean contextBean=new ContextBean();
            contextBean.setId(id);
            contextBean.setUrl(url);
            contextBean.setTitle(title);
            contextBean.setTime(time);
            contextBean.setContent(content);
            esService.saveEntity(contextBean);
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
