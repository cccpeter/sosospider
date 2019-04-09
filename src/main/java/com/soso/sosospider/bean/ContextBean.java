package com.soso.sosospider.bean;

import org.springframework.data.elasticsearch.annotations.Document;

@Document(indexName = "es-customer", type = "customer", shards = 2, replicas = 1, refreshInterval = "-1")
public class ContextBean {
    private String time;

    @Override
    public String toString() {
        return "ContextBean{" +
                "time='" + time + '\'' +
                ", url='" + url + '\'' +
                ", title='" + title + '\'' +
                ", content='" + content + '\'' +
                '}';
    }

    private String url;
    private  String title;
    private String content;
    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }



}
