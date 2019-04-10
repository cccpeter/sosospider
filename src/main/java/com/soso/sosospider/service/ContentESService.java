package com.soso.sosospider.service;

import com.soso.sosospider.bean.ContextBean;

import java.util.List;

public interface ContentESService {
    void saveEntity(ContextBean contextBean);
    void saveEntity(List<ContextBean> contextBeanList);
    List<ContextBean> searchEntity(String searchContent);
}
