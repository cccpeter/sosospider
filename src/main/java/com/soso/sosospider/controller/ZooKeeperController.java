package com.soso.sosospider.controller;

import com.soso.sosospider.service.ZooKeeperImpl;
import org.apache.curator.framework.CuratorFramework;
import org.apache.curator.framework.CuratorFrameworkFactory;
import org.apache.curator.framework.imps.CuratorFrameworkImpl;
import org.apache.zookeeper.data.Stat;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

/**
 * @Author: zp
 * @Date: 2019/5/7 11:43
 * @Description:
 */
@RestController
@RequestMapping("/zookeeper")
public class ZooKeeperController {

    @Autowired
    private CuratorFramework zkClient;

    @Autowired
    private ZooKeeperImpl zooKeeper;


    /**
     * @Author: Oliver
     * @Desc: 获取数据
     * @Date: cretead in 2020/4/3 15:37
     * @Last Modified: by
     * @return value
     */
    @PostMapping("/getData")
    public String getData(@RequestParam String path) {
        byte[] bytes = null;
        try {
            bytes = zkClient.getData().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }

        String str = new String(bytes);
        return str;
    }


    @PostMapping("/create")
    public String create(@RequestParam String path) {
        try {
            zkClient.create().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "success";
    }


    @PostMapping("/delete")
    public String delete(@RequestParam String path) {
        try {
            zkClient.delete().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "success";
    }


    @PostMapping("/setData")
    public String setData(@RequestParam(value = "path") String path, @RequestParam(value = "data") String data) {
        try {
            zkClient.setData().forPath(path, data.getBytes());
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "success";
    }


    @PostMapping("/check")
    public String check(@RequestParam(value = "path") String path) {
        Stat stat = null;
        try {
            stat = zkClient.checkExists().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "stat" + stat;
    }


    @PostMapping("/children")
    public String children(@RequestParam(value = "path") String path) {
        List<String> children = null;
        try {
            children = zkClient.getChildren().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "children" + children;
    }

    @PostMapping("/watch")
    public String watch(@RequestParam(value = "path") String path) {
        Stat stat = null;
        try {
            stat = zkClient.checkExists().watched().forPath(path);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "watch " + stat;
    }


    /**
     * @Author: Oliver
     * @Desc: 模拟分布式锁
     * @Date: cretead in 2020/4/3 15:40
     * @Last Modified: by
     * @return value
     */
    @PostMapping("/makeOrder")
    public String makeOrder(@RequestParam(value = "product") String product) {
        zooKeeper.makeOrder(product);
        return "success";
    }
}