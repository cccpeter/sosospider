package com.soso.sosospider.service;

import com.soso.sosospider.bean.ContextBean;
import io.searchbox.client.JestClient;
import io.searchbox.client.JestResult;
import io.searchbox.core.Bulk;
import io.searchbox.core.Index;
import io.searchbox.core.Search;
import org.elasticsearch.index.query.QueryBuilders;
import org.elasticsearch.search.builder.SearchSourceBuilder;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.elasticsearch.index.query.QueryBuilder;


import java.io.IOException;
import java.util.List;

@Service
public class ESServiceImpl implements ContentESService{

    private static final Logger LOGGER = LoggerFactory.getLogger(ESServiceImpl.class);
    @Autowired
    private JestClient jestClient;

    @Override
    public void saveEntity(ContextBean contextBean){
        Index index = new Index.Builder(contextBean).index(ContextBean.INDEX_NAME).type(ContextBean.TYPE).build();
        try {
            jestClient.execute(index);
            LOGGER.info("ES 插入完成");
        } catch (IOException e) {
            e.printStackTrace();
            LOGGER.error(e.getMessage());
        }
    }
    @Override
    public void saveEntity(List<ContextBean> contextBeanList){
        Bulk.Builder bulk=new Bulk.Builder();
        for(ContextBean contextBean : contextBeanList){
            Index index = new Index.Builder(contextBean).index(ContextBean.INDEX_NAME).type(ContextBean.TYPE).build();
            bulk.addAction(index);
        }
        try {
            jestClient.execute(bulk.build());
            LOGGER.info("ES 插入完成");
        } catch (IOException e) {
            e.printStackTrace();
            LOGGER.error(e.getMessage());
        }
    }
    @Override
    public List<ContextBean> searchEntity(String searchContent){
        SearchSourceBuilder searchSourceBuilder = new SearchSourceBuilder();
        //searchSourceBuilder.query(QueryBuilders.queryStringQuery(searchContent));
        //searchSourceBuilder.field("name");
        searchSourceBuilder.query(QueryBuilders.matchQuery("name",searchContent));
        Search search = new Search.Builder(searchSourceBuilder.toString())
                .addIndex(ContextBean.INDEX_NAME).addType(ContextBean.TYPE).build();
        try {
            JestResult result = jestClient.execute(search);
            return result.getSourceAsObjectList(ContextBean.class);
        } catch (IOException e) {
            LOGGER.error(e.getMessage());
            e.printStackTrace();
        }
        return null;
    }
}
