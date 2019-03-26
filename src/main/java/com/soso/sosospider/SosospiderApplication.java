package com.soso.sosospider;

import cn.edu.hfut.dmic.contentextractor.ContentExtractor;
import cn.edu.hfut.dmic.contentextractor.News;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class SosospiderApplication {

    public static void main(String[] args) {
        /**凤凰网新闻*/
        String url = "http://news.ifeng.com/a/20180814/59808481_0.shtml";

        /**
         * getNewsByHtml 方法内部在获取 标题、时间等内容时如果错误则内部抛异常
         * 对于新闻内容是 js 动态生成时，即页面右击 查看源码 不能看到爬取的内容时，则 ContentExtractor 方法也无能为力
         *
         * ContentExtractor 内容提取器重载了4个方法 获取 News 对象
         * getNewsByUrl(String url)：输入URL，获取结构化新闻信息-------常用的方式
         * getNewsByDoc(Document doc)：输入Jsoup的Document，获取结构化新闻信息
         * getNewsByHtml(String html)：输入HTML，获取结构化新闻信息
         * getNewsByHtml(String html, String url)：输入HTML和URL，获取结构化新闻信息
         *
         */
    try {
        News news = ContentExtractor.getNewsByUrl("http://119.29.189.104:81");
//        System.out.println("网页链接"+news);
        System.out.println("爬取网址：" + news.getUrl());
        System.out.println("发布时间：" + news.getTime());
        System.out.println("文章标题：" + news.getTitle());
        System.out.println("文章内容：" + news.getContent());
    }catch (Exception e){
        System.out.println(e);
    }

        SpringApplication.run(SosospiderApplication.class, args);
    }

}
