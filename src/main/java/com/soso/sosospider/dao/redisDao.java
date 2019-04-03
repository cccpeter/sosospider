package com.soso.sosospider.dao;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.RedisTemplate;
import org.springframework.data.redis.core.StringRedisTemplate;
import org.springframework.data.redis.core.ValueOperations;
import org.springframework.stereotype.Repository;

import javax.annotation.Resource;

@Repository
public class redisDao {
    @Autowired
    StringRedisTemplate stringRedisTemplate;

//    保存redis数据
    public void save(String key,String value){
        ValueOperations<String, String> valOpsStr = stringRedisTemplate
                .opsForValue();
        valOpsStr.set(key, value);
    }
//    获取redis数据
    public String getByKey(String key){
        ValueOperations<String, String> valOpsStr = stringRedisTemplate
                .opsForValue();
        String value = valOpsStr.get(key);
        return value;
    }

}
