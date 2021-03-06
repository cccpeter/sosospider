package com.soso.sosospider.dao;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.StringRedisTemplate;
import org.springframework.data.redis.core.ValueOperations;
import org.springframework.stereotype.Repository;

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
//    入队列
    public String lpush(String key,String value){
        return stringRedisTemplate.opsForList().leftPush(key, value).toString();
    }
//    出对列
    public String rpop(String key){
        return stringRedisTemplate.opsForList().rightPop(key);
    }

//    创建SET
    public boolean sset(String dorm, String key){
        stringRedisTemplate.opsForSet().add(dorm, key);
        return true;
    }
//    获取set
    public boolean gset(String dorm,String key){
        return stringRedisTemplate.opsForSet().isMember(dorm, key);

    }

}
