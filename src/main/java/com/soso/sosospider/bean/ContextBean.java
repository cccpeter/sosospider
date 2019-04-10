package com.soso.sosospider.bean;

import org.springframework.data.annotation.Id;

public class ContextBean {
    private static final long serialVersionUID = -763638353551774166L;

    public static final String INDEX_NAME = "index_entity";

    public static final String TYPE = "tstype";

    @Id
    private String id;
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

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }


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
